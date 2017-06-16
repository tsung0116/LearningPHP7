<?php

namespace Bookstore\Tests\Controllers;

use Bookstore\Controllers\BookController;
use Bookstore\Core\Request;
use Bookstore\Domain\Book;
use Bookstore\Exceptions\{NotFoundException, DbException};
use Bookstore\Models\BookModel;
use Bookstore\Tests\ControllerTestCase;
use Twig_Template;
use Twig_Loader_Filesystem;

require_once __DIR__ . '/../../../vendor/autoload.php';

class BookControllerTest extends ControllerTestCase 
{
    private function getController(Request $request = null): BookController 
    {
        if ($request === null) {
            $request = $this->mock('Core\Request');
        }
        return new BookController($this->di, $request);
    }
    
    public function testBookNotFound() 
    {
        $bookModel = $this->mock(BookModel::class);        
        $bookModel
            ->expects($this->once())
            ->method('get')
            ->with(123)
            ->will($this->throwException(new NotFoundException));            
        
        $this->di->set('BookModel', $bookModel);
        
        $this->expectException(NotFoundException::class);

        //to be continued.
        //$loader = $this->mock(Twig_Loader_Filesystem::class);
        //$view = new Twig_Environment($loader);

        $response = "Rendered template";
        $template = $this->mock(Twig_Template::class);
        $template
            ->expects($this->once())
            ->method('render')
            ->with(['errorMessage' => 'Book not found!'])
            ->will($this->returnValue($response));
        $this->di->get('Twig_Environment')
            ->expects($this->once())
            ->method('loadTemplate')
            ->with('error.twig')
            ->will($this->returnValue($template));

        $result = $this->getController()->borrow(123);

        $this->assertSame($result, $response, 'Response object is not the expected one.');
    }

    protected function mockTemplate(
        string $templateName,
        array $params,
        $response
    ) {
        $template = $this->mock(Twig_Template::class);
        $template
            ->expects($this->once())
            ->method('render')
            ->with($params)
            ->will($this->returnValue($response));
        $this->di->get('Twig_Environment')
            ->expects($this->once())
            ->method('loadTemplate')
            ->with($templateName)
            ->will($this->returnValue($template));
    }

    public function testNotEnoughCopies() 
    {
        $bookModel = $this->mock(BookModel::class);
        $bookModel
            ->expects($this->once())
            ->method('get')
            ->with(123)
            ->will($this->returnValue(new Book()));
        $bookModel
            ->expects($this->never())
            ->method('borrow');
            $this->di->set('BookModel', $bookModel);
        $response = "Rendered template";
        $this->mockTemplate(
            'error.twig',
            ['errorMessage' => 'There are no copies left.'],
            $response
        );
        $result = $this->getController()->borrow(123);
        $this->assertSame(
            $result,
            $response,
            'Response object is not the expected one.'
        );
    }

    public function testErrorSaving() 
    {
        $controller = $this->getController();
        $controller->setCustomerId(9);
        $book = new Book();
        $book->addCopy();
        $bookModel = $this->mock(BookModel::class);
        $bookModel
            ->expects($this->once())
            ->method('get')
            ->with(123)
            ->will($this->returnValue($book));
        $bookModel
            ->expects($this->once())
            ->method('borrow')
            ->with(new Book(), 9)
            ->will($this->throwException(new DbException()));
        
        $this->di->set('BookModel', $bookModel);
        
        $this->expectException(DbException::class);

        $response = "Rendered template";
        $this->mockTemplate(
            'error.twig',
            ['errorMessage' => 'Error borrowing book.'],
            $response
        );
        $result = $controller->borrow(123);
        $this->assertSame(
            $result,
            $response,
            'Response object is not the expected one.'
        );
    }
}
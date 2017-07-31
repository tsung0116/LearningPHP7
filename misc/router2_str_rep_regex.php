<?php

// First, backslash may be used to escape one of the meta characters
// Second, backslash is used as the start of a set of character sequences used to represent nonprinting characters
// Third, backslash is used as the start of a set of generic character types
// e.g. '\d' : A decimal digit

$regexPatters = ['number' => '\d+', 'string' => '\w'];

$name = 'page';
$type = 'number';
$route = 'books/:page';
$path = '/books/50';

$regexRoute = str_replace(':' . $name, $regexPatters[$type], $route);

echo $regexRoute;
echo PHP_EOL;

// With PCRE regular expressions, each expression must be contained within a pair of delimiters.
// You may choose any character that is not a letter, a number, a backslash, or whitespace. 
// The delimiter at the start and end of the string must match.
// @ is used.
echo "@^\/$regexRoute$@";
echo PHP_EOL;

// Be careful to put your regular expression patterns in single-quoted strings in PHP.
// if you want a literal backslash in a double-quoted PHP string, you need to use two
// a doublequoted PHP string that represents a regular expression containing a literal backslash needs
// four backslashes. The PHP interpreter will parse the four backslashes as two, then the regular
// expression interpreter will parse the two as one.
// The dollar sign is also a special character in double-quoted PHP strings and regular expressions.
// To get a literal $ matched in a pattern, you would need "\\\$".

$match = preg_match("@^/$regexRoute$@", '/books/50');
echo $match;
echo PHP_EOL;

$match1 = preg_match('@^books/\d+@', 'books/18');
echo $match1;
#!/usr/bin/perl
use strict;
use warnings;
use CGI qw(:standard);

print header('text/html');

print <<"HTML";
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Perl Program</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 10rem;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }
        .message {
            font-size: 48px;
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="message"><span style="color: green;">This is my</span> first Perl program</div>
</body>
</html>
HTML

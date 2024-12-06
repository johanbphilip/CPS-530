#!/usr/bin/ruby
require 'cgi'

cgi = CGI.new
city = cgi['city'].capitalize
province = cgi['province'].capitalize unless province.empty?
country = cgi['country'].capitalize
picture_url = cgi['picture_url']

print "Content-type: text/html\n\n"
print '''
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ruby City Information</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 {
            text-align: center;
            font-size: 22px;
            padding: 10px;
        }
        img {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
'''
    print "<h1>#{city}, #{country.capitalize}</h1>"
    if province 
      print "<p style='text-align: center;'>Province/State: #{province}</p>"
    end
    print "<img src=#{picture_url} alt=Image of #{city}>"

print "</body></html>"


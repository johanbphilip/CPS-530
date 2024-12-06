#!/usr/bin/python
import cgi

form = cgi.FieldStorage()
city = form.getvalue('city', '').capitalize()
province = form.getvalue('province', '').capitalize()
country = form.getvalue('country', '').capitalize()
picture_url = form.getvalue('picture_url', '')

print("Content-type: text/html\n")
print("""
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Python City Information</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 {
            text-align: center;
            font-size: 22px;
            padding: 10px;
        }
        img {
            display: block;
            width: 80%;
            height: auto;
            margin: auto;
        }
    </style>
</head>
<body>
""")
print(f"<h1>{city.upper()}, {country.upper()}</h1>")

if province:
    print(f"<p style='text-align: center;'>Province/State: {province}</p>")

if picture_url:
    print(f'<img src="{picture_url}" alt="Image of {city}">')

print("</body></html>")

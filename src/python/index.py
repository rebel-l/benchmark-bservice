#!/usr/bin/python
import cgi, cgitb, json

print("Content-Type: text/html")
# print("Content-Type: application/json")
print()

cgitb.enable()

form = cgi.FieldStorage()

name = "World"
if form.getvalue('name') is not None:
	name = form.getvalue('name')

print(json.dumps({"sentence": "Hello " + name}))
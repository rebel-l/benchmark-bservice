#!/usr/bin/python
import cgi, json

print("Content-Type: application/json")
print()

form = cgi.FieldStorage()

name = "World"
if form.getvalue('name') is not None:
	name = form.getvalue('name')

print(json.dumps({"sentence": "Hello " + name}))
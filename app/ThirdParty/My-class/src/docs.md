# Editing json
---

---
## editing table

Code     | Type    | Description
---------|---------|--------------------------------
caption  | String  | header label
show     | Boolean | is show in table
ordering | Number  | header ordering
filter   | Boolean | enabling input filter for field


---
## editing form meta

Code     | Type    | Description
---------|---------|-------------------------------------
label    | string  | form input label
show     | boolean | show or hide the input
ordering | number  | form input position ordering
stub     | string  | input template, one of the following


### stub valid value

Stub Type   | Rendered CI4 Code
------------|------------------------
hidden      | form_hidden($data)
input       | form_input($data)
password    | form_password($data)
textarea    | form_textarea($data)
dropdown    | form_dropdown($data)
multiselect | form_multiselect($data)
checkbox    | form_checkbox($data)
radio       | form_radio($data)
upload      | form_upload($data)


---
## editing form attr

form attributes as html input attribut for example
* id
* name
* required
* value
* class


---
## editing data source

used in data relationship beetwen table to table or data from array

Code             | Type         | Description                 | Restrict Value
-----------------|--------------|-----------------------------|---------------
type             | string       |                             | "array", "db"
array            | array object | example `{"":"Select One"}` |
db               | object       |                             |
db->ref_model    | string       | name of model               |
db->key_fields   | string       | **key** field name          |
db->value_fields | string       | **value** field name        |



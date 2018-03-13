# Webform Checkboxes Table

Webform checkboxes table (grid) component for Drupal 8 Webform module.

The idea is to display checkboxes field in a grid (similar to Likert field but supports multiple values).

| Field title  | Option 1 | Option 2 | Option 3 | ... | Option N |
| ------------- | ------------- | ------------- | ------------- | ------------- | ------------- |
| Checkbox field title 1  | [ ]  | [ ]  | [x]  | ... | [ ]  |
| Checkbox field title 2  | [x]  | [ ]  | [x]  | ...  | [x]  |

Here is example YAML source of the checkboxes table grid.

```YAML
checkboxes_table:
  '#type': checkboxes_table
  '#header':
    - 'Field Label'
    - 'Option 1'
    - 'Option 2'
    - 'Option 3'
    - 'Option 4'
  my_checkboxes_field_title:
    '#type': checkboxes
    '#title': 'My Checkboxes field title'
    '#options':
      'Checkbox 1': 'Checkbox 1'
      'Checkbox 2': 'Checkbox 2'
      'Checkbox 3': 'Checkbox 3'
      'Checkbox 4': 'Checkbox 4'
  another_checkboxes_field:
    '#type': checkboxes
    '#title': 'Another checkboxes field'
    '#options':
      'Option 1': 'Option 1'
      'Option 2': 'Option 2'
      'Option 3': 'Option 3'
      'Option 4': 'Option 4'
```

Module developed by [Minnur Yunusov](https://www.minnur.com) at [Chapter Three](https://www.chapterthree.com)

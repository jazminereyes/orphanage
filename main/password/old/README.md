# PassRequirements
A jQuery plugin that lists a set of requirements for an input field and crosses them out as the input matches each "requirement", useful for hints for passwords, usernames with special requirements,etc.


## Getting Started

### Dependencies

Currently, PassRequirements uses [jQuery](https://jquery.com/) and [Bootstrap's](http://getbootstrap.com/) Popover Plugin.

Be sure to include both before using PassRequirements.

### Including PassRequirements on your page
Include jQuery and Bootstrap on the page, select your input field(s) and call PassRequirements() on them.

The plugin will use the default settings if you pass in no options.
```html
<head>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
	<input id="pass">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<script src="passRequirements.js"></script>
	<script>
		$('#pass').PassRequirements();
	</script>
</body>
```
### Configuration
The available options include:
- **trigger** `['focus'|'click']`: the trigger action for the Bootstrap Popover
- **popoverPlacement** `['top'|'bottom'|'left'|'right']`: the position of the popover
- **defaults** `[true|false]`: a boolean that tells the plugin whether to extend your settings with the default ones
- **rules**:   define the requirements.

#### Default Options

- **trigger**: `'focus'`
- **popoverPlacement**: `'top'`
- **defaults**: unset, assumes `true`
- **rules**: See next section

#### Rules

**rules** is an object that contains a number of rules. Each rule is identified by a *name* and has *text*, *minLength* and *regex* as properties. Anytime the string **minLength** appears in the text property, it is replaced with the value of the **minLength** property

Here's a sample rule: 
```
	containSpecialChars: {
        text: "Your input should contain at least minLength special character",
        minLength: 1,
        regex: new RegExp('([^!,%,&,@,#,$,^,*,?,_,~])', 'g')
    }
```
> Breaking it down

- `containSpecialChars`: This is the name of the rule. This name is also set as the id of the list item on the popover. 
This is how PassRequirements knows what to cross out if a requirement is met.

- `text`: The text to display for the particular requirement. Note the word ***minLength*** in there, it gets replaced with the value of the *minLength* property of the rule. It is **not mandatory** to use the string *minLength* in the text

- `minLength`: The minimum number of occurences of a match on the rule, for example, you might want at least 2 special characters.

- `regex`: The regex that actually makes up the rule. This should follow the example given above, *not leaving out the 'g' option*

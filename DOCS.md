### Features
* Same price as Kanye’s workout plan: $FREE.99!!!!1
* Add code to your entries with a powerful editor.
* Syntax highlighting for over 110 languages
* Over 20 themes
* Toggle between soft tabs and real tabs
* Code folding
* Multiple cursors/selections
* …and potentially all the other things I didn’t copy from the Ace features list.

### Usage
The basics are the same as any other Statamic fieldtype. Just add this to your fieldset:

```yaml
fields:
  code:
    type: code_monkey
```

#### Other options
##### height
```yaml
height: 400
```

##### mode
```yaml
mode: html
```

[Mode options](https://github.com/ajaxorg/ace/tree/master/lib/ace/mode)

##### soft_tabs
```yaml
soft_tabs: true
```

##### tab_size
```yaml
tab_size: 2
```

##### theme
```yaml
theme: tomorrow_night_eighties
```

[Theme options](https://github.com/ajaxorg/ace/tree/master/lib/ace/theme)

#### Pro-tip(s)
Check out the [Ace Kitchen Sink](http://ace.c9.io/build/kitchen-sink.html) to live-test modes and themes.
# Twig Time Tools

A simple twig extension to provide a filter for *ago* to convert timestamps to readable X minutes ago.

**Requirements:**

* [Twig](https://github.com/fabpot/Twig)

## Installation
```
"require": {
	"bearlikelion/twig-timetools": "dev-master",
}
```

## Example
```PHP
$twig = new Twig_Environment(new Twig_Loader_Filesystem('Views'));
$twig->addExtension(new Bearlikelion\TwigTimeTools\Extension);
```

```html
<html>
	<body>
		{{ timestamp|ago }}
	</body>
</html>
```

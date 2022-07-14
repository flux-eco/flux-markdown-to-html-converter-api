# flux-markdown-to-html-converter-api

Markdown To Html Converter Api

## Installation

## Installation

### Native

#### Download

```dockerfile
RUN (mkdir -p /%path%/libs/flux-markdown-to-html-converter-api && cd /%path%/libs/flux-markdown-to-html-converter-api && wget -O - https://github.com/fluxfw/flux-markdown-to-html-converter-api/releases/download/%tag%/flux-markdown-to-html-converter-api-%tag%-build.tar.gz | tar -xz --strip-components=1)
```

or

Download https://github.com/fluxfw/flux-markdown-to-html-converter-api/releases/download/%tag%/flux-markdown-to-html-converter-api-%tag%-build.tar.gz and extract it to `/%path%/libs/flux-markdown-to-html-converter-api`

#### Load

```php
require_once __DIR__ . "/%path%/libs/flux-markdown-to-html-converter-api/autoload.php";
```

### Composer

```json
{
    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "flux/flux-markdown-to-html-converter-api",
                "version": "%tag%",
                "dist": {
                    "url": "https://github.com/fluxfw/flux-markdown-to-html-converter-api/releases/download/%tag%/flux-markdown-to-html-converter-api-%tag%-build.tar.gz",
                    "type": "tar"
                },
                "autoload": {
                    "files": [
                        "autoload.php"
                    ]
                }
            }
        }
    ],
    "require": {
        "flux/flux-markdown-to-html-converter-api": "*"
    }
}
```

## Custom Markdown

### Color

```markdown
@color-%xyz%(Some Text)
```

## Environment variables

| Variable | Description | Default value |
| -------- | ----------- | ------------- |
| FLUX_MARKDOWN_TO_HTML_CONVERTER_API_COLOR_%XYZ% | Color | *-* |

Minimal variables required to set are **bold**

## Example

Look at [flux-markdown-to-html-converter-rest-api](https://github.com/fluxfw/flux-markdown-to-html-converter-rest-api)

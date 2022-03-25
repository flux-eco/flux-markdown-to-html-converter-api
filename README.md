# flux-markdown-to-html-converter-api

Markdown To Html Converter Api

## Installation

```dockerfile
COPY --from=docker-registry.fluxpublisher.ch/flux-markdown-to-html-converter/api:latest /flux-markdown-to-html-converter-api /%path%/libs/flux-markdown-to-html-converter-api
```

## Usage

```php
require_once __DIR__ . "/%path%/libs/flux-markdown-to-html-converter-api/autoload.php";
```

```php
MarkdownToHtmlConverterApi::new();
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

Look at [flux-markdown-to-html-converter-rest-api](https://github.com/fluxapps/flux-markdown-to-html-converter-rest-api)

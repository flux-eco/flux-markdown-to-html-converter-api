# flux-markdown-to-html-converter-api

Markdown To Html Converter Api

## Installation

## Installation

Hint: Use `latest` as `%tag%` (or omit it) for get the latest build

### Non-Composer

```dockerfile
COPY --from=docker-registry.fluxpublisher.ch/flux-markdown-to-html-converter/api:%tag% /flux-markdown-to-html-converter-api /%path%/libs/flux-markdown-to-html-converter-api
```

or

```dockerfile
RUN (mkdir -p /%path%/libs/flux-markdown-to-html-converter-api && cd /%path%/libs/flux-markdown-to-html-converter-api && wget -O - https://docker-registry.fluxpublisher.ch/api/get-build-archive/flux-markdown-to-html-converter/api.tar.gz?tag=%tag% | tar -xz --strip-components=1)
```

or

Download https://docker-registry.fluxpublisher.ch/api/get-build-archive/flux-markdown-to-html-converter/api.tar.gz?tag=%tag% and extract it to `/%path%/libs/flux-markdown-to-html-converter-api`

Hint: If you use `wget` without pipe use `--content-disposition` to get the correct file name

#### Usage

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
                    "url": "https://docker-registry.fluxpublisher.ch/api/get-build-archive/flux-markdown-to-html-converter/api.tar.gz?tag=%tag%",
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

Look at [flux-markdown-to-html-converter-rest-api](https://github.com/flux-caps/flux-markdown-to-html-converter-rest-api)

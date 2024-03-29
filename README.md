[![Latest Stable Version](https://poser.pugx.org/vivomedia/neos-simple-table/v/stable)](https://packagist.org/packages/vivomedia/neos-simple-table)
[![Total Downloads](https://poser.pugx.org/vivomedia/neos-simple-table/downloads)](https://packagist.org/packages/vivomedia/neos-simple-table)
[![License](https://poser.pugx.org/vivomedia/neos-simple-table/license)](https://packagist.org/packages/vivomedia/neos-simple-table)
[![Maintainability](https://api.codeclimate.com/v1/badges/d1c2f796f40a2c5c8eb9/maintainability)](https://codeclimate.com/github/vivomedia-de/neos-simple-table/maintainability)


# VIVOMEDIA Neos-Simple-Table
Simple Html-Table NodeType for Neos CMS.

## What it provides
Easily adding a Table-NodeType in Neos CMS.

At the moment you can provide the data as **CSV string**. This will be parsed and rendered as HTML-Table.

Choose if a header row and/or a highlight column needs to be rendered.

# Install
Install via composer
```bash
composer require vivomedia/neos-simple-table
```
# Usage
Just add well formated Csv with semicolon (;) as delimiter into the data-field of the inspector.
Choose if your data contains any header data and if you need the first column highlighted. Also you may add a caption for your table.

# Extend
## Add attributes to result table
### Add classes to table
```typoscript
prototype(VIVOMEDIA.SimpleTable:HtmlTable) {
  attributes.class {
    table = 'table'
    striped = 'table-striped'
  }
}
```

### Add classes to head
```typoscript
prototype(VIVOMEDIA.SimpleTable:HtmlTableHead) {
  attributes.class {
    something = 'something-special'
  }
}
```

## Render icons or something other special into the cell
You can add some self-defined placeholders and replace them in your custom Fusion. For example replace all `{true}` or `{false}` keywords with an icon:
```
prototype(VIVOMEDIA.SimpleTable:HtmlTableColumn) {

  content {

    isTrue {
      condition = ${item == '{true}'}
      renderer = Neos.Fusion:Tag) {
        tagName = 'img'
        attributes.src = Neos.Fusion:ResourceUri {
          path = 'resource://VIVOMEDIA.SitePackage/Public/icons/checked.svg'
        }
      }
    }

    isFalse {
      condition = ${item == '{false}'}
      renderer = Neos.Fusion:Tag) {
        tagName = 'img'
        attributes.src = Neos.Fusion:ResourceUri {
          path = 'resource://VIVOMEDIA.SitePackage/Public/icons/unchecked.svg'
        }
      }
    }
  }

```

# Screenshots
![Inspector](/Docs/screenshot_inspector.png?raw=true "Inspector")
![Resulting table](/Docs/screenshot_result.png?raw=true "Resulting table")

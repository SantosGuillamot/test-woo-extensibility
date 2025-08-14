# Test Woo Extensibility

The idea of this repo is to test how plugins could extend the frontend of Woo blocks using the iAPI. The goal IS NOT to get production-ready extensions, but to udnerstand the challenges extenders are facing and test the existing APIs to extend blocks in the frontend.

For that, the focus will be the Woo blocks currently using the iAPI. Some examples of extensions that could be interesting to test:

### Add to cart with options

-   Coupons: Add a checkbox input to apply a coupon to the form.
-   Product Quantity Dropdown: Change the quantity input markup.
-   Request a Quote button: Replace the Add to cart button to request a quote.
-   Hide Price & Add to cart button: Remove these blocks conditionally.

### Minicart

Many of the use cases will be covered by the previous examples. Some different use cases:

-   Move the minicart to the sidebar.
-   Make the minicart sticky.
-   Add upsells to the minicart items.

### Product Collection

-   Add a new filter. For example, for custom fields.
-   Transform the search product into an instant search filter.
-   Add zoom to Product image in the loop.
-   Show product gallery instead of product image.

### Product gallery

-   Add new media types like videos or 3D models.
-   Change the layout depending on the product.
-   Remove image zoom and add different effect: The idea is to analyze hoow to remove/change/add interactions.

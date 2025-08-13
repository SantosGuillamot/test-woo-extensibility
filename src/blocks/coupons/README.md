These are some of the limitations found so far, although they still need to be triaged:

-   Using "firstChild" doesn't add the block by default. I need to go to the editor and activate it. Which is different behavior than "before" or "after".
-   I need to activate/deactivate block hooks per block type.
-   Not possible to hide this conditionally. For example, I don't want to show it if the product is out of stock.
-   I can't target a specific group block. For exmaple, I wanted to add it before the group having the quantity selector and the Add to Cart button.
-   I think we need to pass `coupons_line` to an order update through the REST API. We will probably want common actions.
-   We need to add two `on-click` actions, which I am not sure if it is possible right now.

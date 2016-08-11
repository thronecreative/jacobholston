commerce_discount_firsttime
=====================================

Straightforward action and implementation:

What it does: Adds "First Time Order Discount" to
Commerce Discount Condition list, for an "Order" type discount.

How it works:
1. Checks if the UID (User ID) is 0 (Anonymous) then pass as TRUE
2. Otherwise it queries the UID against the commerce_order table,
counts the number of orders that UID has made.
3. If 1 or less than one (Having an active cart, counts as 1.
Ergo, first order), pass condition as TRUE.

1. Download & Enable Module.
2. Create/Edit Discount
3. Add Condition "First Time Discount"
4. Save Discount

Maintainers
=====================================
michaelrobbe - original author
AjitS - current maintainer

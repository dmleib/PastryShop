<?php
/**
 * Author: Deirdre Leib
 * Date: 11/15/24
 * File: cart_controller.class.php
 * Description:
 */


class CartController
{
    public function viewCart()
    {
        session_start();
        $cart = $_SESSION['cart'] ?? [];
        include 'views/cart/cart_view.class.php'; // Pass $cart to the view
    }

    public function addToCart($pastryId, $name, $price, $quantity)
    {
        session_start();

        // If the cart is not initialized, create it
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the item already exists in the cart
        $exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['pastry_id'] === $pastryId) {
                $item['quantity'] += $quantity; // Update quantity
                $exists = true;
                break;
            }
        }

        // Add new item if it doesn't exist
        if (!$exists) {
            $_SESSION['cart'][] = [
                'pastry_id' => $pastryId,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }

        header("Location: /cart");
        exit;
    }

    public function removeFromCart($pastryId)
    {
        session_start();

        if (isset($_SESSION['cart'])) {
            // Filter out the item to be removed
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($pastryId) {
                return $item['pastry_id'] !== $pastryId;
            });
        }

        header("Location: /cart");
        exit;
    }

    public function clearCart()
    {
        session_start();
        unset($_SESSION['cart']);
        header("Location: /cart");
        exit;
    }
}


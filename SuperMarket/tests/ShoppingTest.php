<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Customer;
use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag;

class ShoppingBagTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable_using_start_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = ShoppingBag::startShopping($customer);

        $this->assertInstanceOf(ShoppingBag::class, $shopping);
    }

    public function test_it_should_record_the_customer_started_shopping_event()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = ShoppingBag::startShopping($customer);

        $this->assertInstanceOf(ShoppingBag::class, $shopping);
        $this->assertSame($customer, $shopping->getEventHistory()->getRecordedEvents()[0]->getCustomer());
    }

    public function test_it_should_apply_correct_if_customer_started_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = ShoppingBag::startShopping($customer);

        $shopping->build();
        $this->assertSame($customer, $shopping->getCustomer());
    }

    public function test_it_should_apply_correct_if_product_was_put_into_shopping_bag()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();

        $shopping = ShoppingBag::startShopping($customer);
        $shopping->addProduct($product);

        $shopping->build();
        $this->assertContains($product, $shopping->getProducts());
    }
} 
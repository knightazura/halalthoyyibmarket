<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Sindria\Services\Marketplace\ShoppingCartService;
use Tests\FakeUser;
use Tests\TestCase;
use Sindria\Models\Marketplace\ShoppingCart;
use Sindria\Models\Zero\Package;

class AddToShoppingCartTest extends TestCase
{
    use RefreshDatabase, FakeUser;

    /** @test */
    public function registered_customer_from_homepage()
    {
        $this->withoutExceptionHandling();

        // Simulate logged in user
        $this->actingAs($this->fakeUser());

        $this->fakeCustomer();

        $package = factory(Package::class)->create();

        // If customer add package to shopping cart from homepage, the quantity only one
        $shopping_cart = new ShoppingCartService();
        $shopping_cart->add($package);

        $this->assertCount(1, ShoppingCart::all());
    }
}

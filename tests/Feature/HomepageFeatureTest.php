<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Sindria\Models\Marketplace\Customer;
use Sindria\Models\Marketplace\ShoppingCart;
use Sindria\Models\Marketplace\UserAccount;
use Tests\FakeUser;
use Tests\TestCase;

class HomepageFeatureTest extends TestCase
{
    use RefreshDatabase, FakeUser;

    /** @test */
    public function a_guest_visit_marketplace()
    {
        $this->withoutExceptionHandling();

        $response = $this->visitHomePageAsGuest();

        // Check all contents are proper type
        $package_collections = $response->viewData('package_collections');
        $banners = $response->viewData('banners');
        $posts = $response->viewData('posts');

        $this->assertTrue($package_collections instanceof Collection);
        $this->assertTrue(is_array($banners));
        $this->assertTrue(is_array($posts));

        $response->assertOk();
    }

    /** @test */
    public function a_registered_customer_visit_marketplace()
    {
        $this->withoutExceptionHandling();

        $this->fakeCustomer();

        $response = $this->visitHomepageAsAuthenticatedUser();

        // Check all contents are proper type
        $package_collections = $response->viewData('package_collections');
        $banners = $response->viewData('banners');
        $posts = $response->viewData('posts');
        $customer = $response->viewData('customer');

        $this->assertTrue($package_collections instanceof Collection);
        $this->assertTrue(is_array($banners));
        $this->assertTrue(is_array($posts));
        $this->assertTrue($customer instanceof Customer);

        $response->assertOk();
    }
    
    /** @test */
    public function customer_can_add_package_to_shopping_cart()
    {
        $this->fakeCustomer();

        $response = $this->visitHomepageAsAuthenticatedUser();
    }

    private function visitHomePageAsGuest()
    {
        $response = $this->get(route('home'));

        // Ensure the homepage will have minimum contents
        $response->assertViewHas([
            'package_collections',
            'banners',
            'posts',
        ]);

        // Check returned view is correct
        $response->assertViewIs('home');

        return $response;
    }

    private function visitHomepageAsAuthenticatedUser()
    {
        $response = $this->actingAs($this->user)->get(route('home'));

        // Ensure the homepage will have minimum contents
        $response->assertViewHas([
            'package_collections',
            'banners',
            'posts',
            'customer',
        ]);

        // Check returned view is correct
        $response->assertViewIs('home');

        return $response;
    }
}

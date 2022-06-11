<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_item_can_added_to_a_company()
    {
        $response = $this->actingAs($user = User::factory()->create())->post('/item', $this->data());

        $item = Item::first();
        $this->assertCount(1, Item::all());
        $response->assertRedirect('/item/' . $item->id);
    }

    /** @test */
    public function a_name_is_required()
    {
        $response = $this->post('/item',
            array_merge($this->data(), ['name' => ''])
        );

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_price_is_required()
    {
        $response = $this->post('/item',
            array_merge($this->data(), ['price' => ''])
        );

        $response->assertSessionHasErrors('price');
    }

    /** @test */
    public function an_item_can_be_updated()
    {
        $this->actingAs($user = User::factory()->create())->post('/item', $this->data());
        $item = Item::first();

        $response = $this->patch('/item/' . $item->id, [
            'price' => '2.66'
        ]);

        $this->assertEquals('2.66', Item::first()->price);
        $response->assertRedirect('/item/' . $item->id);
    }


    /** @test */
    public function an_item_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($user = User::factory()->create())->post('/item', $this->data());

        $item = Item::first();

        $response = $this->delete('/item/' . $item->id);

        $this->assertCount(0, Item::all());
        $response->assertRedirect('/items');
    }

    /** @test */
    public function an_item_other_company_cant_be_deleted()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $this->actingAs($user1)->post('/item', $this->data());

        $item = Item::first();

        $response = $this->actingAs($user2)->delete('/item/' . $item->id);

        $this->assertCount(1, Item::all());
        $response->assertStatus(404);
    }

    /**
     * @return string[]
     */
    public function data(): array
    {
        return [
            'name' => 'Meat Pizza Flavor',
            'description' => "Meat, tomatoes and Cheese",
            'price' => "3.50"
        ];
    }
}

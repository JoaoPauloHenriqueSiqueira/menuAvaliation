<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Itens;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_item_can_added_to_a_company()
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($user = User::factory()->create())->post('/item', $this->data());

        $item = Itens::first();
        $this->assertCount(1, Itens::all());
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

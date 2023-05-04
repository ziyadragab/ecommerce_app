<?php

namespace Tests\Feature;

use App\Models\Admin\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // use RefreshDatabase;
     private $user;

     protected function setUp():void
     {
         parent::setUp();
         $this->user=User::factory()->create();

     }

    public function test_category_index(): void
    {


        $response = $this->actingAs($this->user)->get('admin/categories');
        // $response->assertRedirect('admin/categories');
        $this->assertAuthenticated();
        $response->assertStatus(302);
    }
    public function test_category_create(): void
    {

        $response = $this->get('/admin/categories/create');

        $response->assertStatus(302);
    }
    public function test_category_store(): void
    {


//        $data= Category::create([
//           'name'=>'eny',
//           'slug'=>'ziyad',
//           'image'=>'ziyad.jpg',
//
//         ]);
        $response = $this->post('/admin/categories/store');
        $response->assertStatus(302);
        // $this->assertDatabaseHas('categories', $data);

    }

    public function test_category_edit(){
        $category=Category::first();
        $response=$this->get('admin/categories/edit/1');
        $response->assertStatus(302);



    }



}
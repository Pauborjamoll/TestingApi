<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Community;
use Laravel\Sanctum\Sanctum;
use function Pest\Laravel\get;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommunityTest extends TestCase
{

    use RefreshDatabase;

    public function test_can_fetch_all_communities(){
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );
        $response = $this->get('/api/communities');
        $response->assertStatus(200);

    }

    public function test_can_fetch_single_communities(){
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        Community::factory()->create();
        $response = $this->get('/api/communities/1');
        $response->assertStatus(200);

    }

    public function test_can_create_communities(){

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        $data=[

            "title" => "testComunity",
            "body"  => "testComunityBody"
        ];
        $response = $this->postJson('/api/communities',$data,
            ['Content-Type' => 'application/vnd.api+json']);



        $response->assertStatus(201);

    }
    public function test_name_communities_required(){


        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        $data=[

            "title"=>'',
            "body"  => "testComunityBody"
        ];
        $response = $this->postJson('/api/communities',$data,
            ['Content-Type' => 'application/vnd.api+json']);



        $response->assertStatus(500);


    }

    public function test_guests_cannot_create_communities(){


        $data=[

            "title" => "testComunity",
            "body"=> "testComunity"
        ];
        $response = $this->postJson('/api/communities',$data,
            ['Content-Type' => 'application/vnd.api+json']);



            $response->assertUnauthorized();


    }

    public function test_can_update_communities(){

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        $comunidad=Community::factory()->create();
        $data=[

            "title" => "testComunityupdate",
            "body"  => "testComunityBody"
        ];

        $response = $this->patchJson(route('communities.update',$comunidad),$data,
        ['Content-Type' => 'application/vnd.api+json']);


        $response->assertStatus(200);

    }
    public function test_can_delete_communities(){

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        $comunidad=Community::factory()->create();

        $response= $this-> deleteJson(route('communities.destroy',$comunidad));
        $response->assertNoContent();
        $this->assertSoftDeleted($comunidad);

    }

    public function test_can_returns_a_json_api_error_object_when_a_community_is_not_found(){

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );
        $response = $this->getJson(route('communities.show', 999));

        $response->assertJsonStructure();
    }

}

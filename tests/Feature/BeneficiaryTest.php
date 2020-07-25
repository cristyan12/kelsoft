<?php

namespace Tests\Feature;

use App\Beneficiary;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeneficiaryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_load_the_view_of_new_beneficiary()
    {
        $response = $this->get('beneficiaries/create')
            ->assertStatus(200)
            ->assertViewIs('beneficiaries.create')
            ->assertSee('Crear beneficiario');
    }

    /** @test */
    public function it_can_create_a_new_beneficiary()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->post('beneficiaries', [
            'referenced_by' => $user->id,
            'document' => '15456345',
            'name' => 'Fulanito de Tal',
            'pay' => False,
        ])
        ->assertRedirect('beneficiaries');

        $beneficiary = Beneficiary::first();
        $this->assertSame('15456345', $beneficiary->document);
        $this->assertSame('Fulanito de Tal', $beneficiary->name);
        $this->assertSame(False, $beneficiary->pay);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $new_ticket = new Ticket();

            // Assegna valori casuali per le chiavi esterne
            $new_ticket->operator_id = rand(1, 5);
            $new_ticket->category_id = rand(1, 5);

            // Campi generati con Faker
            $new_ticket->title = $faker->sentence(3); // Una frase breve come titolo
            $new_ticket->description = $faker->text(500); // Un paragrafo per la descrizione

            // Stato casuale tra quelli definiti nell'enum
            $statuses = ['assigned', 'in progress', 'closed'];
            $new_ticket->status = $statuses[array_rand($statuses)];

            // Timestamp personalizzato
            $new_ticket->created_at = $faker->dateTimeBetween('-1 year', 'now'); // Data casuale nell'ultimo anno
            $new_ticket->updated_at = $new_ticket->created_at; // Sincronizzato con la data di creazione

            // Salva il ticket nel database
            $new_ticket->save();
        }
    }
}

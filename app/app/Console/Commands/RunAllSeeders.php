<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAllSeeders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all seeders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'ClientsTableSeeder']);
        $this->call('db:seed', ['--class' => 'CategoriesTableSeeder']);
        $this->call('db:seed', ['--class' => 'EtoilesTableSeeder']);
        $this->call('db:seed', ['--class' => 'CommandesTableSeeder']);
        $this->call('db:seed', ['--class' => 'ComposersTableSeeder']);
        $this->call('db:seed', ['--class' => 'DetaillesPaiementsTableSeeder']);
        $this->call('db:seed', ['--class' => 'FacturesTableSeeder']);
        $this->call('db:seed', ['--class' => 'FailedJobsTableSeeder']);
        $this->call('db:seed', ['--class' => 'IngredientsTableSeeder']);
        $this->call('db:seed', ['--class' => 'LivreursTableSeeder']);
        $this->call('db:seed', ['--class' => 'OrderDatesTableSeeder']);
        $this->call('db:seed', ['--class' => 'PaiementsTableSeeder']);
        $this->call('db:seed', ['--class' => 'PasswordResetTokensTableSeeder']);
        $this->call('db:seed', ['--class' => 'PersonalAccessTokensTableSeeder']);
        $this->call('db:seed', ['--class' => 'PlatsTableSeeder']);
        $this->call('db:seed', ['--class' => 'ReserversTableSeeder']);
        $this->call('db:seed', ['--class' => 'TablesTableSeeder']);
        $this->call('db:seed', ['--class' => 'UsersTableSeeder']);
        $this->call('db:seed', ['--class' => 'TestimonialeSeeder']);

        return 0;
    }

}

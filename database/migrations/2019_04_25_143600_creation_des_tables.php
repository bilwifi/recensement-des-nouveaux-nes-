<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationDesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->increments('idcommune');
            $table->string('nom')->unique();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
        });
        Schema::create('quartiers', function (Blueprint $table) {
            $table->increments('idquartier');
            $table->string('nom');
            $table->unsignedInteger('idcommune');

            $table->foreign('idcommune')
                  ->references('idcommune')->on('communes');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('avenues', function (Blueprint $table) {
            $table->increments('idavenue');
            $table->string('lib');
            $table->unsignedInteger('idquartier');
            
            $table->foreign('idquartier')
                  ->references('idquartier')->on('quartiers');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('idadresse');
            $table->string('num');
            $table->unsignedInteger('idavenue');
            
            $table->foreign('idavenue')
                  ->references('idavenue')->on('avenues');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('idpersonne');
            $table->string('numIdN');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->enum('sexe',['M','F']);
            $table->string('lieuNaissance');
            $table->date('dateNaissance');
            $table->unsignedInteger('idadresse');
            $table->string('telephone');
            $table->string('profession');
            $table->string('nationalite');
           
            $table->foreign('idadresse')
                  ->references('idadresse')->on('adresses');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('etablissements', function (Blueprint $table) {
            $table->increments('idetablissement');
            $table->string('nom');
            $table->string('abbr');
            $table->unsignedInteger('idadresse');
            $table->string('slug')->unique();
            
            $table->foreign('idadresse')
                  ->references('idadresse')->on('adresses');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('idrole');
            $table->string('lib');
            $table->unsignedInteger('level');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
           
        });
        Schema::create('users_etablissements', function (Blueprint $table) {
            $table->increments('idusers_etablissement');
            $table->unsignedInteger('idpersonne');
            $table->string('pseudo');
            $table->string('password');
            $table->unsignedInteger('idetablissement');
            $table->unsignedInteger('idrole');
            $table->timestamps();


            $table->foreign('idetablissement')
                  ->references('idetablissement')->on('etablissements');
            $table->foreign('idpersonne')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('idrole')
                  ->references('idrole')->on('roles');


            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('declarations', function (Blueprint $table) {
            $table->increments('iddeclaration');
            $table->unsignedInteger('idpere');
            $table->unsignedInteger('idmere');
            $table->unsignedInteger('idenfant');
            $table->unsignedInteger('iddeclarant');
            $table->unsignedInteger('idetablissement');
            $table->string('cituation_matrimonial_parent');
            $table->string('cituation_amoureuse_parent');
            $table->string('commentaire');
            $table->enum('statut',[0,1,2]);
            $table->timestamps();

            
            $table->foreign('idpere')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('idmere')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('idenfant')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('iddeclarant')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('idetablissement')
                  ->references('idetablissement')->on('etablissements');


            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
        });
        Schema::create('agents_communes', function (Blueprint $table) {
            $table->increments('idagents_commune');
            $table->unsignedInteger('idpersonne');
            $table->unsignedInteger('idcommune');
            $table->string('pseudo');
            $table->string('password');
            $table->timestamps();
            

            $table->foreign('idpersonne')
                  ->references('idpersonne')->on('personnes');
            $table->foreign('idcommune')
                  ->references('idcommune')->on('communes');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents_communes');
        Schema::dropIfExists('declarations');
        Schema::dropIfExists('users_etablissements');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('etablissements');
        Schema::dropIfExists('personnes');
        Schema::dropIfExists('adresses');
        Schema::dropIfExists('avenues');
        Schema::dropIfExists('quartiers');
        Schema::dropIfExists('communes');

    }
}

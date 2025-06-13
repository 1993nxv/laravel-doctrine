<?php

namespace App\Console\Commands;

use App\Entities\Empresa;
use App\Entities\Endereco;
use App\Entities\Categoria;
use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class PopularBancoCommand extends Command
{
    protected $signature = 'doctrine:seed';

    protected $description = 'Popula o banco com dados de teste';

    public function __construct(private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    public function handle()
    {
        $categoria1 = new Categoria();
        $categoria1->setNome('Tecnologia');

        $empresa = new Empresa();
        $empresa->setNome('Acme LTDA');
        $empresa->setEmail('contato@acme.com');
        $empresa->setTelefone('11 99999-9999');
        $empresa->addCategoria($categoria1);

        $endereco = new Endereco();
        $endereco->setLogradouro('Rua das Flores, N123, Goiânia-GO');
        $empresa->addEndereco($endereco);

        $this->em->persist($empresa);
        $this->em->flush();

        $user = new User();
        $user->setEmail('admin@teste.com');
        $user->setPassword(Hash::make('123'));
        $this->em->persist($user);
        $this->em->flush();

        $this->info('Dados inseridos com sucesso!');
    }
}
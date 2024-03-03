<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Contatos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\Enum\TipoPessoa;
use AleBatistella\BlingErpApi\Entities\Contatos\Enum\IndicadorIe;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $nome
     * @param ?string $codigo
     * @param ?Situacao $situacao
     * @param ?string $numeroDocumento
     * @param ?string $telefone
     * @param ?string $celular
     * @param ?string $fantasia
     * @param ?TipoPessoa $tipo
     * @param ?IndicadorIe $indicadorIe
     * @param ?string $ie
     * @param ?string $rg
     * @param ?string $orgaoEmissor
     * @param ?string $email
     * @param ?FindResponseDataEndereco $endereco
     * @param ?Id $vendedor
     * @param ?FindResponseDataDadosAdicionais $dadosAdicionais
     * @param ?FindResponseDataFinanceiro $financeiro
     * @param ?FindResponseDataPais $pais
     * @param FindResponseDataTiposContato[] $tiposContato
     * @param FindResponseDataPessoasContato[] $pessoasContato
     */
    public function __construct(
        public ?int $id,
        public ?string $nome,
        public ?string $codigo,
        public ?Situacao $situacao,
        public ?string $numeroDocumento,
        public ?string $telefone,
        public ?string $celular,
        public ?string $fantasia,
        public ?TipoPessoa $tipo,
        public ?IndicadorIe $indicadorIe,
        public ?string $ie,
        public ?string $rg,
        public ?string $orgaoEmissor,
        public ?string $email,
        public ?FindResponseDataEndereco $endereco,
        public ?Id $vendedor,
        public ?FindResponseDataDadosAdicionais $dadosAdicionais,
        public ?FindResponseDataFinanceiro $financeiro,
        public ?FindResponseDataPais $pais,
        public ?array $tiposContato,
        public ?array $pessoasContato,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'tiposContato'   => FindResponseDataTiposContato::class,
            'pessoasContato' => FindResponseDataPessoasContato::class,
        ];
    }
}

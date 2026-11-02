<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostosOutros extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosOutrosCSLLPISCOFINSDTO $CSLLPISCOFINSDTO
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosOutrosINSS $INSS
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosOutrosAproximados $aproximados
     */
    public function __construct(
        public ?GetConfigurationsResponseImpostosOutrosCSLLPISCOFINSDTO $CSLLPISCOFINSDTO,
        public ?GetConfigurationsResponseImpostosOutrosINSS $INSS,
        public ?GetConfigurationsResponseImpostosOutrosAproximados $aproximados,
    ) {
    }
}

<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetConfigurationsResponseImpostosOutros extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?GetConfigurationsResponseImpostosOutrosCSLLPISCOFINSDTO $CSLLPISCOFINSDTO
     * @param ?GetConfigurationsResponseImpostosOutrosINSS $INSS
     * @param ?GetConfigurationsResponseImpostosOutrosAproximados $aproximados
     */
    public function __construct(
        public ?GetConfigurationsResponseImpostosOutrosCSLLPISCOFINSDTO $CSLLPISCOFINSDTO,
        public ?GetConfigurationsResponseImpostosOutrosINSS $INSS,
        public ?GetConfigurationsResponseImpostosOutrosAproximados $aproximados,
    ) {
    }
}

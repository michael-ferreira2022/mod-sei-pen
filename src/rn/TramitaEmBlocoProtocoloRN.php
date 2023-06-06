<?php

require_once DIR_SEI_WEB.'/SEI.php';

/**
 * Regra de neg�cio para o par�metros do m�dulo PEN
 */
class TramitaEmBlocoProtocoloRN extends InfraRN
{
    /**
     * Inicializa o obj do banco da Infra
     * @return obj
     */
    protected function inicializarObjInfraIBanco()
    {
        return BancoSEI::getInstance();
    }

    /**
     * M�todo utilizado para exclus�o de dados.
     * @param TramitaEmBlocoProtocoloDTO $objDTO
     * @return array
     * @throws InfraException
     */
    protected function listarControlado(TramitaEmBlocoProtocoloDTO $objDTO)
    {
        try {
            //Valida Permiss�o
            //SessaoSEI::getInstance()->validarAuditarPermissao('pen_expedir_lote', __METHOD__, $objDTO);

            $objTramitaEmBlocoProtocoloBD = new TramitaEmBlocoProtocoloBD($this->getObjInfraIBanco());
            $arrTramitaEmBlocoProtocoloDTO = $objTramitaEmBlocoProtocoloBD->listar($objDTO);

            return $arrTramitaEmBlocoProtocoloDTO;
        } catch (\Exception $e) {
            throw new InfraException('Falha na listagem de pend�ncias de tr�mite de processos em lote.', $e);
        }
    }

    /**
     * M�todo utilizado para exclus�o de dados.
     * @param TramitaEmBlocoProtocoloDTO $objDTO
     * @return array
     * @throws InfraException
     */
    protected function excluirControlado(TramitaEmBlocoProtocoloDTO $objDTO)
    {
        try {
            $objBD = new TramitaEmBlocoProtocoloBD(BancoSEI::getInstance());
            return $objBD->excluir($objDTO);
        } catch (Exception $e) {
            throw new InfraException('Erro excluindo mapeamento de unidades.', $e);
        }
    }
}

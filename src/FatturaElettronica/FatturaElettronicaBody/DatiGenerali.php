<?php
/**
 * Created by PhpStorm.
 * User: salgua
 * Date: 20/11/2018
 * Time: 17:57
 */

namespace Deved\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody;

use Deved\FatturaElettronica\XmlSerializableInterface;

class DatiGenerali implements XmlSerializableInterface
{
    /** @var string */
    protected $tipoDocumento;
    /** @var string */
    protected $data;
    /** @var string */
    protected $numero;
    /** @var float */
    protected $importoTotaleDocumento;
    /** @var string */
    protected $divisa;

    /**
     * DatiGenerali constructor.
     * @param string $tipoDocumento
     * @param string $data
     * @param string $numero
     * @param float $importoTotaleDocumento
     * @param string $divisa
     */
    public function __construct
    (
        $tipoDocumento,
        $data,
        $numero,
        $importoTotaleDocumento,
        $divisa = 'EUR'
    )
    {
        $this->tipoDocumento = $tipoDocumento;
        $this->data = $data;
        $this->numero = $numero;
        $this->importoTotaleDocumento = $importoTotaleDocumento;
        $this->divisa = $divisa;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiGenerali');
            $writer->startElement('DatiGeneraliDocumento');
                $writer->writeElement('TipoDocumento', $this->tipoDocumento);
                $writer->writeElement('Divisa', $this->divisa);
                $writer->writeElement('Data', $this->data);
                $writer->writeElement('Numero', $this->numero);
                $writer->writeElement('ImportoTotaleDocumento',
                    number_format($this->importoTotaleDocumento, 2));
            $writer->endElement();
        $writer->endElement();
        //todo: implementare DatiOrdineAcquisto, DatiContratto etc. (facoltativi)
    }
}

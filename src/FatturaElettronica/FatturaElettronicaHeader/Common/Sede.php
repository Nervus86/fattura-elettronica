<?php
/**
 * Created by PhpStorm.
 * User: salgua
 * Date: 21/11/2018
 * Time: 16:18
 */

namespace Deved\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common;


use Deved\FatturaElettronica\XmlSerializableInterface;

class Sede implements XmlSerializableInterface
{

    /** @var string */
    protected $nazione;
    /** @var string */
    protected $indirizzo;
    /** @var string */
    protected $cap;
    /** @var string */
    protected $comune;
    /** @var string */
    protected $provincia;

    /**
     * Sede constructor.
     * @param string $nazione
     * @param string $indirizzo
     * @param string $cap
     * @param string $comune
     * @param string $provincia
     */
    public function __construct
    (
        $nazione,
        $indirizzo,
        $cap,
        $comune,
        $provincia = ''
    )
    {
        $this->nazione = $nazione;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->comune = $comune;
        $this->provincia = $provincia;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('Sede');
            $writer->writeElement('Indirizzo', $this->indirizzo);
            $writer->writeElement('CAP', $this->cap);
            $writer->writeElement('Comune', $this->comune);
            if ($this->provincia) {
                $writer->writeElement('Provincia', $this->provincia);
            }
            $writer->writeElement('Nazione', $this->nazione);
        $writer->endElement();
    }
}

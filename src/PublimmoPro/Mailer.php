<?php

namespace PublimmoPro;

class Mailer
{
    /** @var array mandatoryFields  list all the mandatory userdata fields */
    public const MANDATORY_FIELDS = [
        'title',
        'lastname',
        'firstname',
        'email',
        'phone',
        'language',
    ];

    /** @var string FROM_MAIL  from email address */
    private const FROM_MAIL = 'demande-no-reply@publimmo.pro';

    /** @var string subject  email subject */
    public const SUBJECT = 'Copie webmail publimmo';

    /** @var string toMail  contains the email address to send data to */
    public $toMail;

    /** @var array userdata  contains all user entered data */
    public $userdata;

    /** @var PublimmoPro\ObjectEntity objectEntity  the object we want to send data to */
    public $objectEntity;

    /** @var string siteUrl  the site url used to build the html link */
    private $siteUrl;

    /**
     * Class constructor
     */
    public function __construct(ObjectEntity $objectEntity, array $userdata, string $siteUrl)
    {
        $this->siteUrl = $siteUrl;
        $this->objectEntity = $objectEntity->raw();
        $this->toMail = $this->objectEntity->contact->contactWebmail.'@publimmo.net';
        $this->userdata = array_merge([
            // mandatory fields
            'title' => '',
            'lastname' => '',
            'firstname' => '',
            'email' => '',
            'phone' => '',
            'language' => '',

            // secondary fields
            'address' => '',
            'zipcode' => '',
            'city' => '',
            'country' => '',
            'message' => '',
        ], $userdata);

        // Validation
        foreach ($this->userdata as $k => $v) {
            if (in_array($k, self::MANDATORY_FIELDS) && empty($v)) {
                throw new \InvalidArgumentException('userdata must contain a '.$k.' value.');
            }

            if ($k === 'email' && !filter_var($v, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException('User email is invalid.');
            }
        }

        return $this;
    }

    public function getEmailBody()
    {
        extract($this->userdata);

return '
<table border=0>
<tbody>
<tr><td valign=top><b>Objet:</b></td><td><a href="'.$this->siteUrl.'/objet/'.$this->objectEntity->id.'">'.$this->objectEntity->id.'</a></td></tr>
<tr><td valign=top><b>ContactId:</b></td><td>'.$this->objectEntity->contact->contactId.'</td></tr>
<tr><td valign=top><b>Politesse:</b></td><td>'.$title.'</td></tr>
<tr><td valign=top><b>Nom:</b></td><td>'.$lastname.'</td></tr>
<tr><td valign=top><b>Prénom:</b></td><td>'.$firstname.'</td></tr>
<tr><td valign=top><b>Adresse:</b></td><td>'.$address.'</td></tr>
<tr><td valign=top><b>Npa:</b></td><td>'.$zipcode.'</td></tr>
<tr><td valign=top><b>Localité:</b></td><td>'.$city.'</td></tr>
<tr><td valign=top><b>Pays:</b></td><td>'.$country.'</td></tr>
<tr><td valign=top><b>E-mail:</b>:</td><td>'.$email.'</td></tr>
<tr><td valign=top><b>Tel. privé:</b></td><td>'.$phone.'</td></tr>
<tr><td valign=top><b>Langue:</b></td><td>'.$language.'</td></tr>
</tbody>
</table>
<table border="0" width="500">
<tr><td valign=top colspan=2><br>'.$message.'</td></tr>
<tr><td><br/></td></tr>
</table>
';
    }
}


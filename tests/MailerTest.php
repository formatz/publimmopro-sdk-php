<?php
use PHPUnit\Framework\TestCase;
use \PublimmoPro\ObjectEntity;
use \PublimmoPro\Mailer;

final class MailerTest extends TestCase
{
    private $objectEntity;
    private $queryResult;
    private $userdata;
    private $mailer;

    public function setUp(): void
    {
        $this->queryResult = json_decode(file_get_contents(__dir__.'/objectResult.json'));
        $this->objectEntity = new ObjectEntity($this->queryResult);
        $this->objectEntityRaw = $this->objectEntity->raw();
        $this->userdata = [
            // mandatory fields
            'title' => 'Mr.',
            'lastname' => 'Doe',
            'firstname' => 'John',
            'email' => 'john@doe.test',
            'phone' => '021 555 55 55',
            'language' => 'en',

            // secondary fields
            'address' => 'Test Road 1',
            'zipcode' => '31232',
            'city' => 'City of tests',
            'country' => 'TestCountry',
            'message' => "Hey, this is my message !\n onmultiple lines",
        ];

        $this->mailer = new Mailer($this->objectEntity, $this->userdata, 'https://testwebsite.com');
    }

    public function mandatoryFieldsProvider(): array
    {
        $mandatoryFields = Mailer::MANDATORY_FIELDS;

        return array_combine($mandatoryFields, array_map(function($field) {
            return [
                $field,
                $field,
                $field
            ];
        }, $mandatoryFields));
    }

    /**
     * @dataProvider mandatoryFieldsProvider
     */
    public function testMissingMandatoryFieldRaiseAnException($field): void
    {
        $this->expectException(InvalidArgumentException::class);
        $userdata = $this->userdata;
        unset($userdata[$field]);
        $mailer = new Mailer($this->objectEntity, $userdata, 'https://testwebsite.com');
    }

    public function testInvalidEmailRaiseAnException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $userdata = $this->userdata;
        $userdata['email'] = 'invalidemail';
        $mailer = new Mailer($this->objectEntity, $userdata, 'https://testwebsite.com');
    }

    public function testEmailBodyIsGeneratedCorrectly(): void
    {
        $body = $this->mailer->getEmailBody();

        extract($this->userdata);
        $this->assertStringContainsString('<tr><td valign=top><b>Objet:</b></td><td><a href="https://testwebsite.com/objet/'.$this->objectEntityRaw->id.'">'.$this->objectEntityRaw->id.'</a></td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>ContactId:</b></td><td>'.$this->objectEntityRaw->contact->contactId.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Politesse:</b></td><td>'.$title.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Nom:</b></td><td>'.$lastname.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Prénom:</b></td><td>'.$firstname.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Adresse:</b></td><td>'.$address.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Npa:</b></td><td>'.$zipcode.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Localité:</b></td><td>'.$city.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Pays:</b></td><td>'.$country.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>E-mail:</b>:</td><td>'.$email.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Tel. privé:</b></td><td>'.$phone.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top><b>Langue:</b></td><td>'.$language.'</td></tr>', $body);
        $this->assertStringContainsString('<tr><td valign=top colspan=2><br>'.$message.'</td></tr>', $body);
    }
}

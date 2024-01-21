<?php
    use PHPUnit\Framework\TestCase;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../Mailer/VerificationMail.php';
    require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';
    
    class VerificationMailTest extends TestCase {
        public function testSendVerificationEmailSuccess() {
            // Mock the PHPMailer class
            // $phpMailerMock = $this->createMock(PHPMailer::class);
            $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
                ->onlyMethods(['send', 'getSMTPInstance', 'smtpClose'])  // Exclude __destruct from mocking
                ->getMock();
            $phpMailerMock->expects($this->once())
                ->method('send')
                ->willReturn(true);
    
    
            // Replace the real PHPMailer instance with the mock
            $originalMailer = new PHPMailer();
            $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
            // Call the function with mocked PHPMailer
            $email = 'surajkumar820912@gmail.com';
            $token = 'testToken';
            sendVerificationEmail($email, $token);
        }
    
        public function testSendVerificationEmailFailure() {
            // Mock the PHPMailer class
            // $phpMailerMock = $this->createMock(PHPMailer::class);
            $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
                ->onlyMethods(['send', 'getSMTPInstance', 'smtpClose'])  // Exclude __destruct from mocking
                ->getMock();
            $phpMailerMock->expects($this->once())
                ->method('send')
                ->willReturn(false);
    
    
            // Replace the real PHPMailer instance with the mock
            $originalMailer = new PHPMailer();
            $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
            // Call the function with mocked PHPMailer
            $email = 'test@example.com';
            $token = 'testToken';
            sendVerificationEmail($email, $token);
        }
    
        // Helper function to set private/protected properties
        private function setPrivateProperty($object, $property, $value) {
            $reflectedClass = new ReflectionClass(get_class($object));
            $property = $reflectedClass->getProperty($property);
            $property->setAccessible(true);
            $property->setValue($object, $value);
        }
    }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->createMock(PHPMailer::class);
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(true);

    //         // Add the connected() method to the mock
    //         // $phpMailerMock->expects($this->any())
    //         //     ->method('connected')
    //         //     ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->createMock(PHPMailer::class);
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Add the connected() method to the mock
    //         // $phpMailerMock->expects($this->any())
    //         //     ->method('connected')
    //         //     ->willReturn(false);

    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['connected'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['connected'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(false);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder('SMTP')
    //             ->onlyMethods(['connected'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder('SMTP')
    //             ->onlyMethods(['connected'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(false);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance', 'getSMTP'])
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['startTLS', 'connect'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance', 'getSMTP'])
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['startTLS', 'connect'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['startTLS', 'connect'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);
    
    //         // $phpMailerMock->expects($this->once())
    //         //     ->method('send')
    //         //     ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])
    //             ->getMock();
    
    //         $smtpMock = $this->getMockBuilder(SMTP::class)
    //             ->onlyMethods(['startTLS', 'connect'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpMock);
    
    //         $smtpMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])
    //             ->getMock();
    
    //         $smtpWrapperMock = $this->getMockBuilder(SMTPWrapper::class)
    //             ->onlyMethods(['startTLS', 'connect', 'connected'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpWrapperMock);
    
    //         $smtpWrapperMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpWrapperMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);

    //         $smtpWrapperMock->setConnected(true);
    
    //         $smtpWrapperMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(true);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     public function testSendVerificationEmailFailure() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance'])
    //             ->getMock();
    
    //         $smtpWrapperMock = $this->getMockBuilder(SMTPWrapper::class)
    //             ->onlyMethods(['startTLS', 'connect', 'connected'])
    //             ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpWrapperMock);
    
    //         $smtpWrapperMock->expects($this->once())
    //             ->method('startTLS')
    //             ->willReturn(true);
    
    //         $smtpWrapperMock->expects($this->once())
    //             ->method('connect')
    //             ->willReturn(true);

    //         $smtpWrapperMock->setConnected(false);
    
    //         $smtpWrapperMock->expects($this->any())
    //             ->method('connected')
    //             ->willReturn(false);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(false);
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'test@example.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class VerificationMailTest extends TestCase {
    //     public function testSendVerificationEmailSuccess() {
    //         // Mock the PHPMailer class
    //         $phpMailerMock = $this->getMockBuilder(PHPMailer::class)
    //             ->onlyMethods(['send', 'getSMTPInstance', 'smtpClose'])  // Mock only the necessary methods
    //             ->getMock();
    
    //         // Mock the SMTPWrapper class
    //         // $smtpWrapperMock = $this->getMockBuilder(SMTPWrapper::class)
    //         //     ->onlyMethods(['connected'])  // Mock only the necessary methods
    //         //     ->getMock();
    
    //         $phpMailerMock->method('getSMTPInstance')
    //             ->willReturn($smtpWrapperMock);
    
    //         // $smtpWrapperMock->setConnected(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('send')
    //             ->willReturn(true);
    
    //         $phpMailerMock->expects($this->once())
    //             ->method('smtpClose');  // Expecting smtpClose to be called
    
    //         // Replace the real PHPMailer instance with the mock
    //         $originalMailer = new PHPMailer();
    //         $this->setPrivateProperty($originalMailer, 'smtp', $phpMailerMock);
    
    //         // Call the function with mocked PHPMailer
    //         $email = 'surajkumar820912@gmail.com';
    //         $token = 'testToken';
    //         sendVerificationEmail($email, $token);
    //     }
    
    //     // Add similar tests for other cases
    
    //     // Helper function to set private/protected properties
    //     private function setPrivateProperty($object, $property, $value) {
    //         $reflectedClass = new ReflectionClass(get_class($object));
    //         $property = $reflectedClass->getProperty($property);
    //         $property->setAccessible(true);
    //         $property->setValue($object, $value);
    //     }
    // }

    // class SMTPWrapper extends SMTP {
    //     private $isConnected = false;
    
    //     public function setConnected($isConnected) {
    //         $this->isConnected = $isConnected;
    //     }
    
    //     public function connected() {
    //         return $this->isConnected;
    //     }
    // }

?>
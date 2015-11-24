<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\Core\Configure;


/**
 * SentMessages Controller
 *
 * @property \App\Model\Table\SentMessagesTable $SentMessages
 */
class SentMessagesController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('sentMessages', $this->paginate($this->SentMessages));//->find()->order(['ID' => 'desc'])));
        $this->set('_serialize', ['sentMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Sent Message id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sentMessage = $this->SentMessages->get($id, [
            'contain' => []
        ]);
        $this->set('sentMessage', $sentMessage);
        $this->set('_serialize', ['sentMessage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sentMessage = $this->SentMessages->newEntity();
        if ($this->request->is('post')) {
            $sentMessage = $this->SentMessages->patchEntity($sentMessage, $this->request->data);
            $error = false;

            if ($this->SentMessages->save($sentMessage)) {
                $client = new \Services_Twilio(Configure::read('mysmsisonfire.twilio.accountSid'), Configure::read('mysmsisonfire.twilio.authToken'));
                try {
                    $message = $client->account->messages->sendMessage(
                        Configure::read('mysmsisonfire.twilio.from'), // From a valid Twilio number
                        $this->request->data['phonenumber'], // Text this number
                        $this->request->data['message']
                    );
                } catch (\Services_Twilio_RestException $e) {
                    $error = 'Twilio said no: "' . $e->getMessage() . '"';
                }

                if ($error) {
                    $this->Flash->error(__($error));
                } elseif (!empty($message) && !empty($message->sid)) {
                    $sentMessage->status = "sent";
                    $this->SentMessages->save($sentMessage);

                    $this->Flash->success(__('Your message has been sent.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Twilio said no, dunno why like. No exception'));
                }
            } else {
                $this->Flash->error(__('The message could not be sent. Please, try again.'));
            }
        }
        $this->set(compact('sentMessage'));
        $this->set('_serialize', ['sentMessage']);
    }
}

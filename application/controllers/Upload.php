<?php 

class Upload extends CI_Controller {
  public function documents($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $response = array();

    $config = array(
      'upload_path' => 'uploads/files',
      'allowed_types' => 'pdf|docx|doc',
    );

    $counter = 0;
  
    $documents = array(
      'cashreq' => empty($_FILES['cashreq']['tmp_name']),
      'prog' => empty($_FILES['prog']['tmp_name']),
      'moa' => empty($_FILES['moa']['tmp_name']),
      'list' => empty($_FILES['list']['tmp_name']),
      'food' => empty($_FILES['food']['tmp_name']),
      'map' => empty($_FILES['map']['tmp_name']),
      'hospital' => empty($_FILES['hospital']['tmp_name']),
      'mod' => empty($_FILES['mod']['tmp_name']),
      'parents' => empty($_FILES['parents']['tmp_name']),
      'waiver' => empty($_FILES['waiver']['tmp_name']),
      'med' => empty($_FILES['med']['tmp_name']),
      'reserv' => empty($_FILES['reserv']['tmp_name']),
      'entry' => empty($_FILES['entry']['tmp_name']),
      'imc' => empty($_FILES['imc']['tmp_name']),
      'sponsor' => empty($_FILES['sponsor']['tmp_name']),
      'invite' => empty($_FILES['invite']['tmp_name']),
      'excuse' => empty($_FILES['excuse']['tmp_name']),
    );

    $document_names = array(
      'Cash Request',
      'Program',
      'Moa of Suppliers',
      'List of Participants',
      'Food Request',
      'Map and Contact Person',
      'Contact of Hospital & Police Station',
      'Letter of Moderator',
      'Letter to the Parents',
      'Waiver Forms',
      'Medical Kit',
      'Letter of Reservation',
      'Letter of Entry',
      'IMC Reservation',
      'Letter of Sponsorship',
      'Letter of Invitation',
      'Excuse Letter',
    );

    foreach($documents as $key => $value) {
      if ($value) {
        unset($documents[$key]);
        unset($document_names[$counter]);
      }
      $counter++;
      
    }

    $document_names = array_values($document_names);
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    // var_dump($documents);

    $counter = 0;
    foreach($documents as $key => $value) {
      if (!$this->upload->do_upload($key)) {
        $response['success'] = false;
        $response['remark'] = "The filetype is invalid. Only upload .pdf, .docx, or .doc files.";
        echo json_encode($response);
        exit;

      } else {
        // var_dump($key);
        $document_data = $this->upload->data();
        $document = $document_data['file_name'];
      }

      if (!$this->proposals_model->checkIfUploadExists($proposal_id, $account_id, $document_names[$counter])) {
        if (!$this->proposals_model->uploadDocs($proposal_id, $account_id, $document, $document_names[$counter])) {
          $response['success'] = false;
          $response['remark'] = $this->upload->display_errors();
          echo json_encode($response);
        }
      } else {

        if (!$this->proposals_model->overwriteDocs($proposal_id, $account_id, $document_names[$counter], $document)) {
          $response['success'] = false;
          $response['remark'] = $this->upload->display_errors();
          echo json_encode($response);
        }

      }
    
      $counter++;
    }

    $response['success'] = true;

    echo json_encode($response);



    // var_dump($document_names);
    // var_dump($documents);

    
  }
}


?>
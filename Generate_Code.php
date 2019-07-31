function generate_invoice($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $this->check_invoice_id_before($s);
    }
    public function check_invoice_id_before($invoice_id) {
        $this->db->select('st.invoice_id');
        $this->db->from('solobanking_transactions st');
        $this->db->where('st.invoice_id', $invoice_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $this->generate_invoice(4, '0123456789ABCDEF');

        } else {
        

    return $invoice_id;

   }

    }
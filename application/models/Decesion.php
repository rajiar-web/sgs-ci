<?php
class Decesion extends CI_Model
{
    function getReason()
    {
      $this->db->where('r_status','1');
      $q = $this->db->get('cc_reasons');
      return $q->result();
    }
    function getAgerange()
    {
      $this->db->where('a_status','1');
      $q = $this->db->get('cc_age_range');
      return $q->result();
    }
    function getProfession()
    {
      $this->db->where('p_status','1');
      $q = $this->db->get('cc_profession');
      return $q->result();
    }
    function getInvestment ()
    {
      $this->db->where('i_status','1');
      $q = $this->db->get('cc_investment_objective');
      return $q->result();
    }
    function getRequirement ()
    {
      $this->db->where('f_status','1');
      $q = $this->db->get('cc_financial_requirements');
      return $q->result();
    }
    function getConcerns ()
    {
      $this->db->where('cons_status','1');
      $q = $this->db->get('cc_concerns');
      return $q->result();
    }
    function getLackofincome ()
    {
      $this->db->where('l_status','1');
      $q = $this->db->get('cc_lack_of_income');
      return $q->result();
    }
    function getCountry ()
    {
      $this->db->where('c_status','1');
      $q = $this->db->get('cc_country');
      return $q->result();
    }

    function insert_searchform($param)
    {
      return $this->db->insert("cc_users_search",$param);
    }

    function insert_searchformresult($param)
    {
      return $this->db->insert("cc_search_result",$param);
    }

    function getCompany ($id)
    {
      if(!empty($id))
      {
        $this->db->select('s_investment_objective_id');
        $this->db->where('s_status','1');
        $this->db->where('s_id', $id);
        $investment_list = $this->db->get('cc_search_result');
        $investment_list_id =  $investment_list->result();
        if(!empty($investment_list_id))
        {
           $investment = json_decode($investment_list_id[0]->s_investment_objective_id);

        }
      }

      $this->db->select('c.*');
      $this->db->join('cc_company_filter_table f','f.com_filter_company_id=c.com_id','left');
      $this->db->where('c.com_status','1');
      $this->db->where_in('f.com_filter_investment_id', $investment);
      $this->db->limit(3, 0);
      $list = $this->db->get('cc_company c');
      $companys =  $list->result();
      return $companys;
    }

    
}

              @foreach ($fee_data as $row)
                
                @php
              if($cclass=="All" and $section=="All")
              {
                  echo $row->stu_id;
              }
      
              if($cclass!="All" and $section=="All")
              {
                
                if(App\Models\Student_Model::getDatabyClass($row->sid,$cclass)=="True")
                {
                    echo $row->stu_id;
                }
                
              }
      
              if($cclass!="All" and $section!="All")
              {
            
                if(App\Models\Student_Model::getDatabySection($row->sid,$cclass, $section)=="True")
                {
                    echo $row->stu_id;
                }
            
              }
              @endphp
              
               
            @endforeach
         
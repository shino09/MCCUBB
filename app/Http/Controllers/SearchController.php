<?php
namespace Magister\Http\Controllers;


    use Illuminate\Http\Request;
use Magister\Http\Controllers\Controller;
    use Magister\Alumno;
   
class SearchController extends Controller
{

   public function autocomplete(){
    $term = Alumno::get('term');
    
    $results = array();
    
    $queries = DB::table('ALUMNO')
        ->where('ALU_NOMBRES', 'LIKE', '%'.$term.'%')
        ->orWhere('ALU_PATERNO', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->ALU_NOMBRES.' '.$query->ALU_PATERNO ];
    }
return Response::json($results);
}
}
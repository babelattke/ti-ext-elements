@if ($element)
    @if ($element->istypeA)               
        @partial('@typeA')
    @elseif ($element->istypeB) 
        @partial('@typeB')
    @elseif ($element->istypeC) 
        @partial('@typeC', ['categories' => $categories->toTree()]) 
    @elseif ($element->istypeD) 
        @partial('@typeD')
    @elseif ($element->istypeF) 
        @partial('@typeF')
    @elseif ($element->istypeG) 
        @partial('@typeG')
    @elseif ($element->istypeH) 
        @partial('@typeH') 
    @elseif ($element->istypeI) 
        @partial('@typeI')   
    @elseif ($element->istypeJ) 
        @partial('@typeJ')  
    @elseif ($element->istypeK) 
        @partial('@typeK')  
    @elseif ($element->istypeL) 
        @partial('@typeL')       
    @endif
@endif

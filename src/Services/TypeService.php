<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Property\Models\Type;

class TypeService extends Service{

    public function __construct(Type $type)
    {
        $this->model = $type;
    }

}

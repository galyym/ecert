<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute қабылдануы керек.',
    'accepted_if' => ':other мәні :value болғанда, :attribute қабылдануы керек.',
    'active_url' => ':attribute жарамды URL мекенжайы емес.',
    'after' => ':attribute мәні :date күнінен кейінгі күн болуы керек.',
    'after_or_equal' => ':attribute мәні :date күнінен кейінгі немесе тең күн болуы керек.',
    'alpha' => ':attribute тек әріптерден тұруы керек.',
    'alpha_dash' => ':attribute тек әріптерден, сандардан, сызықшалардан және астын сызу белгілерінен тұруы керек.',
    'alpha_num' => ':attribute тек әріптерден және сандардан тұруы керек.',
    'array' => ':attribute жиым болуы керек.',
    'before' => ':attribute мәні :date күнінен бұрынғы күн болуы керек.',
    'before_or_equal' => ':attribute мәні :date күнінен бұрынғы немесе тең күн болуы керек.',
    'between' => [
        'array' => ':attribute мәні :min және :max аралығындағы элементтерден тұруы керек.',
        'file' => ':attribute мәні :min және :max килобайт аралығында болуы керек.',
        'numeric' => ':attribute мәні :min және :max аралығында болуы керек.',
        'string' => ':attribute мәні :min және :max таңба аралығында болуы керек.',
    ],
    'boolean' => ':attribute мәні шын немесе жалған болуы керек.',
    'confirmed' => ':attribute растауы сәйкес келмейді.',
    'current_password' => 'Құпия сөз дұрыс емес.',
    'date' => ':attribute жарамды күн емес.',
    'date_equals' => ':attribute мәні :date күніне тең болуы керек.',
    'date_format' => ':attribute мәні :format пішіміне сәйкес келмейді.',
    'declined' => ':attribute мәні қабылданбауы керек.',
    'declined_if' => ':other мәні :value болғанда, :attribute мәні қабылданбауы керек.',
    'different' => ':attribute және :other мәндері әртүрлі болуы керек.',
    'digits' => ':attribute мәні :digits саннан тұруы керек.',
    'digits_between' => ':attribute мәні :min және :max сан аралығында болуы керек.',
    'dimensions' => ':attribute мәні жарамсыз кескін өлшемдерін қамтиды.',
    'distinct' => ':attribute мәні қайталанбауы керек.',
    'email' => ':attribute жарамды электрондық пошта мекенжайы болуы керек.',
    'ends_with' => ':attribute мәні мына мәндердің бірімен аяқталуы керек: :values.',
    'enum' => 'Таңдалған :attribute жарамсыз.',
    'exists' => 'Таңдалған :attribute жарамсыз.',
    'file' => ':attribute файл болуы керек.',
    'filled' => ':attribute мәні болуы керек.',
    'gt' => [
        'array' => ':attribute мәні :value элементтен көп болуы керек.',
        'file' => ':attribute мәні :value килобайттан үлкен болуы керек.',
        'numeric' => ':attribute мәні :value мәнінен үлкен болуы керек.',
        'string' => ':attribute мәні :value таңбадан үлкен болуы керек.',
    ],
    'gte' => [
        'array' => ':attribute мәні :value элементтен көп немесе тең болуы керек.',
        'file' => ':attribute мәні :value килобайттан үлкен немесе тең болуы керек.',
        'numeric' => ':attribute мәні :value мәнінен үлкен немесе тең болуы керек.',
        'string' => ':attribute мәні :value таңбадан үлкен немесе тең болуы керек.',
    ],
    'image' => ':attribute сурет болуы керек.',
    'in' => 'Таңдалған :attribute жарамсыз.',
    'in_array' => ':attribute мәні :other ішінде жоқ.',
    'integer' => ':attribute бүтін сан болуы керек.',
    'ip' => ':attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => ':attribute жарамды IPv4 мекенжайы болуы керек.',
    'ipv6' => ':attribute жарамды IPv6 мекенжайы болуы керек.',
    'json' => ':attribute жарамды JSON жолы болуы керек.',
    'lt' => [
        'array' => ':attribute мәні :value элементтен аз болуы керек.',
        'file' => ':attribute мәні :value килобайттан аз болуы керек.',
        'numeric' => ':attribute мәні :value мәнінен аз болуы керек.',
        'string' => ':attribute мәні :value таңбадан аз болуы керек.',
    ],
    'lte' => [
        'array' => ':attribute мәні :value элементтен аз немесе тең болуы керек.',
        'file' => ':attribute мәні :value килобайттан аз немесе тең болуы керек.',
        'numeric' => ':attribute мәні :value мәнінен аз немесе тең болуы керек.',
        'string' => ':attribute мәні :value таңбадан аз немесе тең болуы керек.',
    ],
    'mac_address' => ':attribute жарамды MAC мекенжайы болуы керек.',
    'max' => [
        'array' => ':attribute мәні :max элементтен аспауы керек.',
        'file' => ':attribute мәні :max килобайттан аспауы керек.',
        'numeric' => ':attribute мәні :max мәнінен аспауы керек.',
        'string' => ':attribute мәні :max таңбадан аспауы керек.',
    ],
    'mimes' => ':attribute мына түрдегі файл болуы керек: :values.',
    'mimetypes' => ':attribute мына түрдегі файл болуы керек: :values.',
    'min' => [
        'array' => ':attribute мәні кемінде :min элементтен тұруы керек.',
        'file' => ':attribute мәні кемінде :min килобайт болуы керек.',
        'numeric' => ':attribute мәні кемінде :min болуы керек.',
        'string' => ':attribute мәні кемінде :min таңбадан тұруы керек.',
    ],
    'multiple_of' => ':attribute мәні :value еселігі болуы керек.',
    'not_in' => 'Таңдалған :attribute жарамсыз.',
    'not_regex' => ':attribute пішімі жарамсыз.',
    'numeric' => ':attribute сан болуы керек.',
    'present' => ':attribute мәні болуы керек.',
    'prohibited' => ':attribute мәніне тыйым салынған.',
    'prohibited_if' => ':other мәні :value болғанда, :attribute мәніне тыйым салынған.',
    'prohibited_unless' => ':other мәні :values ішінде болмаса, :attribute мәніне тыйым салынған.',
    'prohibits' => ':attribute мәні :other мәнінің болуына тыйым салады.',
    'regex' => ':attribute пішімі жарамсыз.',
    'required' => ':attribute мәні міндетті.',
    'required_array_keys' => ':attribute мәні мына кілттерді қамтуы керек: :values.',
    'required_if' => ':other мәні :value болғанда, :attribute мәні міндетті.',
    'required_unless' => ':other мәні :values ішінде болмаса, :attribute мәні міндетті.',
    'required_with' => ':values мәні болғанда, :attribute мәні міндетті.',
    'required_with_all' => ':values мәндері болғанда, :attribute мәні міндетті.',
    'required_without' => ':values мәні болмағанда, :attribute мәні міндетті.',
    'required_without_all' => ':values мәндерінің ешқайсысы болмағанда, :attribute мәні міндетті.',
    'same' => ':attribute және :other мәндері сәйкес келуі керек.',
    'size' => [
        'array' => ':attribute мәні :size элементтен тұруы керек.',
        'file' => ':attribute мәні :size килобайт болуы керек.',
        'numeric' => ':attribute мәні :size болуы керек.',
        'string' => ':attribute мәні :size таңбадан тұруы керек.',
    ],
    'starts_with' => ':attribute мәні мына мәндердің бірінен басталуы керек: :values.',
    'string' => ':attribute жол болуы керек.',
    'timezone' => ':attribute жарамды уақыт белдеуі болуы керек.',
    'unique' => ':attribute бұрын алынған.',
    'uploaded' => ':attribute жүктелу сәтсіз аяқталды.',
    'url' => ':attribute жарамды URL болуы керек.',
    'uuid' => ':attribute жарамды UUID болуы керек.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

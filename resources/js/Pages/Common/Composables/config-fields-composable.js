export const UseVehiclesConf = () =>{

    const conf  = (
        state,
        typeInput = 'text',
        label = null,
        additionalData = [],
        isRequired = true,
        isVisible = true,
        fun = null
      ) =>

        ({
            error: state.errors[0],
            label: label == null ?   state.path : label,
            typeInput,
            additionalData : [ ...additionalData],
            isRequired,
            isVisible,
            fun
        })

    return {
        conf
    }

}

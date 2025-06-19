export const UseVehiclesConf = () =>{

    const conf  = (
        state,
        typeInput = 'text',
        label = null,
        additionalData = [],
        isRequired = true,
        isVisible = true
      ) =>

        ({
            error: state.errors[0],
            label: label == null ?   state.path : label,
            typeInput,
            additionalData : [ ...additionalData],
            isRequired,
            isVisible
        })

    return {
        conf
    }

}

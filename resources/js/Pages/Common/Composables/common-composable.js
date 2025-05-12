import { usePage } from "@inertiajs/vue3"
import { computed } from "vue"

export const  useUserInfo = () =>{

    const userInfo = usePage().props.user


    const isAdmin = computed( () => userInfo.current?.rol?.codigo === 'super-admin')

    return {
        isAdmin
    }
}


export const useDefaultCommon = () =>{

    const noImage = "https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg?w=826"

    const noImageUrl = computed( ()=> noImage)


    const vehicleNoImageUrl = "https://www.flat6mag.com/medias/images/porsche-917k-mcqueen-le-mans.png"
    const vehicleNoImage = computed(() => vehicleNoImageUrl)


    const providerNoImageUrl ="https://png.pngtree.com/png-vector/20240129/ourmid/pngtree-d-illustration-of-car-repair-shop-car-service-station-building-concept-png-image_11565697.png"
    const providerNoImage = computed(()=> providerNoImageUrl)

    const serviceNoImageUrl = "https://hi-spec.com/cdn/shop/articles/Tools_Every_DIY_Mechanic_Needs_-_Header_image_821x350_crop_center.jpg?v=1640855146"
    const serviceNoImage = computed( ( ) => serviceNoImageUrl)

    return{
        providerNoImage,
        noImageUrl,
        vehicleNoImage,
        serviceNoImage
    }
}
